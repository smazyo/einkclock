# E-Ink Clock

This is a hobby project to use an e-ink device as a clock that sits on my desk. The screen is a "Waveshare 2.13inch Touch E-Paper E-Ink Display for Raspberry Pi Zero", and the Pi itself is a Pi Zero WH (not 2nd gen.)

The build consists of two parts: a web server to generate the image that gets rendered on the e-ink screen, and a Raspberry Pi that pulls the image from the server and displays it on the e-ink. Because the refresh rate of the screen is low, I have it update in 10 minute increments. The main purpose (aside from playing around with the technology) is to see at a glance what time it is in a few different time zones - Canada, Europe, and the Philippines.

## Web Server

### Web page 

The image used is generated as a PHP page. PHP was chosen HTML and CSS are powerful tools for graphics and layouts, it is straightforward to edit/preview in the browser. In addition, the smoothest way to turn HTML into an image is to use a server-side rendered page, hence PHP.

The page outputs a strictly black and white image within a 250 x 122 px area, which is the dimensions of the e-ink screen. It has the time in various regions and displays a random Pokemon. The Pokemon images have been upscaled (nearest neighbour) then dithering has been used to provide detail. This process was done in Photoshop.

Here is a screenshot of the rendered webpage:

![Screenshot showing the Pokemon Xatu](/readme/sample.png)

### Apache server

The page is served using Apache, configured for PHP, running in a Proxmox LXC - it is not hosted on the Pi itself, as the 1GB of RAM on the Pi is too much of a performance bottleneck. It is configured this way so that I can easily adjust it in future. 

The script 'screenshot-site.py' is set up as executable using Apache's CGI module. This script uses the Playwright library to take open a Chromium instance and take a screenshot, then return that screenshot to the browser.

## Raspberry Pi setup

Raspberry Pi Zero WH runs Raspbian 13 with desktop mode disabled. If you are attempting to do this make sure that in `sudo raspi-config` SPI and IC2 are enabled. I used Samba to transfer the files to the pi once set up.

## AI usage disclaimer

No AI generated code was used in this project. AI was used for some debugging (specific issues around RPi hardware, as well as Apache CGI server config issues). 