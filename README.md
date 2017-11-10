# ZnZendSession

A Zend Framework 2 module to implement different sessions per module in an application.

## Introduction

This ZF2 module is intended to start different sessions for each module where user interaction is involved.
A usage scenario would be of an application that has a backend module for internal staff and
a frontend module for external clients.

With a single session shared by all modules in the application, a conflict may arise if a staff were to log in to the
backend and open the frontend in another browser tab. Is a staff a client as well? If yes, all is good. If not, how
does the application store 2 authenticated identities in the same session? Different containers can be used but
authentication/authorization modules such as ZfcUser/ZfcRbac will need to be tweaked as well with custom adapters.

This module will create 2 separate sessions for the backend and frontend modules. Each module can therefore have its
own authenticated identity.

## Requirements

*   PHP 5.3.3 and above

*   Zend Framework 2

## Installation

1. Clone this project into your `./vendor/` directory
2. Enable it in your `application.config.php` file under the `modules` section
3. It must be loaded before all the other modules, ie. on the 1st line in the `modules` section,
   so that the session name can be set correctly before being started
