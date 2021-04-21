moodle-local_signupcode
==========================

Moodle plugin which requires a code for signup.

Requirements
------------

This plugin requires Moodle 3.10. 

Motivation for this plugin
--------------------------

This plugin is intended to provide security against unwanted users creating accounts.

Installation
------------

Install the plugin like any other plugin to folder
/local/signupcode

See http://docs.moodle.org/en/Installing_plugins for details on installing Moodle plugins

Usage & Settings
----------------

After installing the plugin, it must be enabled in Site administration -> Plugins -> Local Plugins -> Signup Code.

On the settings page, once you have entered the Pre Signup Code the plugin will be enabled.  When a user clicks to create an account,
they will be required to enter that code in order to proceed to the signup page.

In the Settings, enter into the editor for Pre Signup Info, the information to give your users for entering the code. For example, where
they can get the code, etc. 

In the Settings, enter into the editor for Pre Signup Error, the information to give your users if they enter an incorrect code.

Plugin repositories
-------------------

The latest development version can be found on Github:
https://github.com/charbusch/moodle-local_signupcode

Bug and problem reports / Support requests
------------------------------------------

This plugin is carefully developed and thoroughly tested, but bugs and problems can always appear.

Please report bugs and problems on Github:
https://github.com/charbusch/moodle-local_signupcode/issues

I will do our best to solve your problems, but please note that due to limited resources I can't always provide per-case support.

Copyright
---------

CBusch

on behalf of

My clients
