# E-Ink Clock

This is a hobby project to use an e-ink device as a clock that sits on my desk. The screen is a "Waveshare 2.13inch Touch E-Paper E-Ink Display for Raspberry Pi Zero".

The build consists of two parts: a web server to generate the image that gets rendered on the e-ink screen, and a Raspberry Pi that pulls the image from the server and displays it on the e-ink. Because the refresh rate of the screen is low, I have it update in 10 minute increments. The main purpose (aside from playing around with the technology) is to see at a glance what time it is in a few different time zones - Canada, Europe, and the Philippines.

## Web Server

The page is served using Apache, configured for PHP, running in a Proxmox LXC - it is not hosted on the Pi itself. It is configured this way so that I can easily adjust it in future. PHP was chosen HTML and CSS are powerful tools for graphics and layouts, it is straightforward to edit/preview in the browser, and PHP produces a rendered

The page itself outputs a strictly black and white image within a 250 x 122 px area, which is the dimensions of the e-ink screen. It has the time in various regions and displays a random Pokemon. The Pokemon images have been upscaled (nearest neighbour) then dithering has been used to provide detail. 

Here is a screenshot of the rendered webpage:

![Screenshot showing the Pokemon Xatu](/readme/sample.png)

## Raspberry Pi setup

Raspberry Pi Zero WH runs Raspbian 13 with desktop mode disabled. If you are attempting to do this make sure that in `sudo raspi-config` SPI and IC2 are enabled. I used Samba to transfer the files to the pi once set up.


## AI usage disclaimer

No AI generated code was used in this project. AI was used for some debugging (specific issues around RPi hardware).