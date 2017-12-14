#!/usr/bin/env python

# Copyright (C) 2017 Google Inc.
#
# Licensed under the Apache License, Version 2.0 (the "License");
# you may not use this file except in compliance with the License.
# You may obtain a copy of the License at
#
#     http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.


from __future__ import print_function

import argparse
import os.path
import json

import google.oauth2.credentials

from google.assistant.library import Assistant
from google.assistant.library.event import EventType
from google.assistant.library.file_helpers import existing_file

# My custom
import urllib.request
from datetime import datetime
#int(datetime.now().strftime('%Y%m%d%H%M%S'))
import RPi.GPIO as GPIO
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BCM)
GPIO.setup(21,GPIO.OUT)
GPIO.setup(20,GPIO.OUT)
GPIO.setup(16,GPIO.OUT)
GPIO.output(21,GPIO.HIGH)
GPIO.output(20,GPIO.HIGH)
GPIO.output(16,GPIO.HIGH)
def process_event(event,assistant):
    """Pretty prints events.

    Prints all events that occur with two spaces between each new
    conversation and a single space between turns of a conversation.

    Args:
        event(event.Event): The current event to process.
    """
    if event.type == EventType.ON_CONVERSATION_TURN_STARTED:
        print()
    print(event)

    if event.type == EventType.ON_RECOGNIZING_SPEECH_FINISHED:
        temp = event.args
        if temp["text"] == "turn the light on":
            assistant.stop_conversation()
            GPIO.output(21,GPIO.LOW)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=light&state=1&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turnning Light On")
        elif temp["text"] == "turn the light off":
            assistant.stop_conversation()
            GPIO.output(21,GPIO.HIGH)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=light&state=0&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turnning Light Off")
        elif temp["text"] == "turn the fireplace on":
            assistant.stop_conversation()
            GPIO.output(20,GPIO.LOW)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=fireplace&state=1&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turning fireplace On")
        elif temp["text"] == "turn the fireplace off":
            assistant.stop_conversation()
            GPIO.output(20,GPIO.HIGH)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=fireplace&state=0&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turning fireplace Off")
        elif temp["text"] == "turn the air conditioner on":
            assistant.stop_conversation()
            GPIO.output(16,GPIO.LOW)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=aircon&state=1&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turning the air condition On")
        elif temp["text"] == "turn the air conditioner off":
            assistant.stop_conversation()
            GPIO.output(16,GPIO.HIGH)
            url = 'http://toitulam.online/thesis/updatevalue.php?equip=aircon&state=0&time={0}'.format(int(datetime.now().strftime('%Y%m%d%H%M%S')))
            urllib.request.urlopen(url)
            print("Turning the air condition off")


    if (event.type == EventType.ON_CONVERSATION_TURN_FINISHED and
            event.args and not event.args['with_follow_on_turn']):
        print()


def main():
    parser = argparse.ArgumentParser(
        formatter_class=argparse.RawTextHelpFormatter)
    parser.add_argument('--credentials', type=existing_file,
                        metavar='OAUTH2_CREDENTIALS_FILE',
                        default=os.path.join(
                            os.path.expanduser('~/.config'),
                            'google-oauthlib-tool',
                            'credentials.json'
                        ),
                        help='Path to store and read OAuth2 credentials')
    args = parser.parse_args()
    with open(args.credentials, 'r') as f:
        credentials = google.oauth2.credentials.Credentials(token=None,
                                                            **json.load(f))
    with Assistant(credentials) as assistant:
        for event in assistant.start():
            process_event(event,assistant)


if __name__ == '__main__':
    main()
