=== Plugin Name ===
Voxpow — Speech Recognition for your website
Contributors: @voxpow
Tags: speech, speech recognition, voice recognition, voice detection, write with voice, voice commands, voice command
Requires at least: 4.8
Tested up to: 5.4.1
Requires PHP: 5.6
Stable tag: 1.1.5
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A tool that adds speech recognition and voice commands to your website for free.

== Description ==

Speech Recognition Tool powered by Machine Learning. Direct on your website and for free.

**No coding skills needed. Create up your account and enjoy the power of Speech Recognition**

To start using the tool, create a FREE account at [voxpow.com](https://voxpow.com/) to obtain a tracker instance.

You will really enjoy all the free functionality, but you can also spend some time to take a look at our PRO features.

**How does it work?**
The Voxpow WordPress plugin holds your tracker ID and API key and make everything needed to install the script recognition libraries in your website.
Our plugin installs the code in the **body** tag of the website.
All the additional settings you can control from the admin section in [voxpow.com](https://voxpow.com/)

[youtube https://youtu.be/LrFTAf3cTVw]

**Coming soon**
* List of the user searches inside the WordPress admin section

If you have suggestions for new features, feel free to email us at **hello (at) voxpow.com**

== Installation ==

1. Search and install the plugin through the Install Plugins page of your WordPress dashboard.
2. Create a FREE account on the [Voxpow website](https://voxpow.com).
3. Activate the Voxpow plugin through the Plugins page of your WordPress dashboard by entering your tracker ID and API token.

== Frequently Asked Questions ==

= Question 1: Will the JavaScript files slow down my website? =

No, we use one of the fastest content delivery networks, and the files are very tiny at all. For PRO trackers - you can enable to keep the user search in order of plain-text. In that situation, we also make sure that our servers respond as fast as possible to remember what the user searches.

= Question 2: Can Voxpow be used to capture the full text spoken by the user? =

Yes, it is possible to catch all user speech and use it for typing and searching. Security is an essential topic for us, so the user can only fill text inputs that are not disabled or hidden. It is not allowed to type passwords or in hidden fields.

= Question 3: Which browsers are supported? =

Voxpow works with all browsers that implement the Speech Recognition interface of the Web Speech API (such as Google Chrome, Samsung Internet, and other). You can find a more detailed explanation [here](https://voxpow.com/features/browser-comptability/)

= Question 4: What are "Commands" in the context of Voxpow? =

Commands are instructions that you set in the administrative dashboard of our service. They are spread all around the world with CDN, and all users have the last copy of your instructions. Commands, in a nutshell, are something like this: "make this if a user says that". For example, if a user says "red shoes", and you defined this type of search in your commands interface - the user is redirected to the address you specified or to the website search if you don't have a command for that.

= Question 5: What languages are supported? =

At all, it depends on browsers, but you can find a list and additional information [here](https://voxpow.com/features/browser-comptability/).

= Question 6: What is the command "Exact match => Redirection"? =

It is a type of command available in PRO trackers. If use says "last news", you can redirect him to the exact page with the last news. It matches exact, so if he says "last news from today", your "Exact match => Redirection" command is not fired. Instead - Voxpow will fallback to your website search page if you have such.

= Question 7: What happen if I deactivate Voxpow WP plugin? =

The Voxpow code is removed from your WordPress site, and you can not enjoy the power of Speech Recognition.

== Screenshots ==


== Changelog ==

= 1.0 =
* First release of Voxpow WP plugin

= 1.1.0 =
* Bug fixes and improvements in main class

= 1.1.5 =
* Bug fixes and improvements in connection class


== Upgrade Notice ==

= 1.0 =
* Create the plugin

= 1.1 =
* Visual improvements
* Add token verification
