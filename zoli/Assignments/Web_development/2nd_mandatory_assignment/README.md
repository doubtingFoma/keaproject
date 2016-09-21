# Mandatory Assignment 2
###### *Deadline: 4 October 2016 - 23:59*

*(official requirements)*

## Requirements for the system

-   No database at all
-   All the data is saved into files

## The system has 2 entry points

-   ADMIN
-   USER

### The ADMIN

The admin has access to 2 pages. The login page and the control-panel page.
To be able to login, you can hard-code a file in the server that has, let’s say, 3 administrators. Each of them with an email and a password. This file containing the admin data could be called “administrators.json” and it contains an array with JSON objects depicting the administrators.
The control-panel page is a website in which the administrator can see all the products in a list and also add, edit, delete any of them. This page works with AJAX.

### The USER

The user page is a simple website that displays all the products that the administrator has created. The user cannot edit, delete, or change any product at all.
This page updates the prices of the products every second (AJAX). The price is set by the administrator in the control-panel.
If any price goes up, then the product displays a green arrow and get colored green.
If any price goes down, then the products displays a red arrow and get colored red.
