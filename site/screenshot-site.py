#!/opt/eink/venv/bin/python
from playwright.sync_api import sync_playwright
import configparser
from os import path
from os import environ
from sys import stdout

environ["PLAYWRIGHT_BROWSERS_PATH"] = "/opt/pw-browsers"

basepath = path.dirname(path.realpath(__file__))

config = configparser.ConfigParser()
config.read(f'{basepath}/config.conf')

SCREENSHOT_PATH = config['config']['screenshot_path']

IMAGE_WIDTH = 250;
IMAGE_HEIGHT = 122;

site_url = config['config']['site']

def save_site_screenshot(site=site_url, path=SCREENSHOT_PATH):
    '''
    Save an image of the rendered website
    '''
    with sync_playwright() as p:
        browser = p.chromium.launch()
        page = browser.new_page()
        page.goto(site)

        clip = {
            'x': 0,
            'y': 0,
            'width': IMAGE_WIDTH,
            'height': IMAGE_HEIGHT
        }
        png = page.screenshot(clip=clip)
        browser.close()
    return png

if __name__ == '__main__':
    png = save_site_screenshot()

    stdout.write("Content-type: image/png\r\n\r\n")
    stdout.flush()
    stdout.buffer.write(png)
    stdout.buffer.flush()
