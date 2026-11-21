#!/usr/bin/python
from PIL import Image
import configparser
from os import path
import requests

# "TP_lib" directory as supplied from manufacturer
from TP_lib import epd2in13_V4

config = configparser.ConfigParser()
basepath = path.dirname(path.realpath(__file__))

config.read('config.conf')

SCREENSHOT_IMAGE = 'screenshot.png'
site_url = config['config']['site']

print('init device')
epd = epd2in13_V4.EPD()
epd.init(epd.FULL_UPDATE)

print('initted. fetching image')
with open(SCREENSHOT_IMAGE, 'wb') as file:
    file.write(requests.get(site_url).content)

print('image retrieved. adjusting then outputting')
img = Image.open(SCREENSHOT_IMAGE).rotate(180).convert("1", dither=Image.Dither.NONE)
epd.display(epd.getbuffer(img))