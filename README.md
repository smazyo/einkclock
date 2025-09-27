# E-Ink Clock

This is a hobby project to use an e-ink device as a clock that sits on my desk. The screen is a "Waveshare 2.13inch Touch E-Paper E-Ink Display for Raspberry Pi Zero".

The build consists of two parts: a web server to generate the image that gets rendered on the e-ink screen, and a Raspberry Pi that pulls the image from the server and displays it on the e-ink. Because the refresh rate of the screen is low, I have it update in 10 minute increments. The main purpose (aside from playing around with the technology) is to see at a glance what time it is in a few different time zones - Canada, Europe, and the Philippines.

## Web Server

The page is served using Apache, configured for PHP, running in a Proxmox LXC - it is not hosted on the Pi itself. It is configured this way so that I can easily adjust it in future. A PHP server is used because HTML and CSS are powerful tools for graphics and layouts.

The page itself outputs a strictly black and white image within a 250 x 122 px area, which is the dimensions of the e-ink screen. It has the time in various regions and displays a random Pokemon. The Pokemon images have been upscaled (nearest neighbour) then dithering has been used to provide detail. Here is a screenshot:

![Screenshot showing the Pokemon Xatu](/readme/sample.png)
