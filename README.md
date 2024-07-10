# Assessment project for interview at Steets

This project is made as an assessment for an interview at Steets.

Made by Justin Leemans.

# Assignment

Below is an overview of the assessment assignment that was given. It is kept here in the README.md for easy documentation and keeping track of all requirements.

### Intro

We'd like to see how you handle this testcase. It uses databases, encryption, date functions and some AJAX handling. Please write everything in OOP. You can leave the html/css plain. A little styling is a nice to have.

### Year

Create a simple form with an input year and use the method POST.

Count the filled in year backwards, and show which year is a primenumber. Execute it until you have 30 prime years. Also tell on which day christmas is (monday, tuesday etc.). Don't show this yet on the frontend. We'll be adding it to the database first.

### Encryption in database

Create a simple table in MySQL with 3 columns (id, year, day). 

Encrypt the day, where christmas is on, using an encryption of your liking. Save it to the table with prepared statements or with . If it's already present, you won't have to insert it again.

When it's done, return all of the (decrypted) rows in a simple html table and return the output from your initially input year.

### Summary

1. Input data:
    - Input year
    - Send form
        - Send data to server
        - Insert encrypted data into database
2. Output data:
    - Decrypt data 
    - Output using JSON object
    - Show a table with the handled data
  
# Logbook

Below is a logbook where I keep track of when I worked on what tasks and a rough estimate of how much time I spent on that day.

Total time spent: 6 hours

### 4-7-2024

Time spent: 1 hour

- Setup Git repository
- Initialized Laravel project through Laravel Sail and Docker Desktop

### 5-7-2024

Time spent: 1 hour

- Added AlpineJs and Bootstrap to project through Vite
- Added page layout and included bundled node modules

### 8-7-2024

Time spent: 1 hour

- Fixed small issue with AlpineJs initialisation
- Created database migration, model and controller
- Added starter page for showing the form

### 9-7-2024

Time spent: 2 hours

- Added form to page
- Added all neccesairy routes and controller methods
- Added ajax form submission to form

### 10-7-2024

Time spent: 1 hour

- Added logic for calculating years that are prime numbers to controller
- Added logic for finding christmas day on those year
- Linked everything together
- Fixed resulting bugs
- Polished final result
