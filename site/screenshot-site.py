from playwright.sync_api import sync_playwright
import configparser
from os import path

basepath = path.dirname(path.realpath(__file__))

config = configparser.ConfigParser()
config.read(f'{basepath}/config.conf')

SCREENSHOT_PATH = 'screenshot.png'

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
        page.screenshot(path=path, clip=clip)
        browser.close()

if __name__ == '__main__':
    save_site_screenshot()

