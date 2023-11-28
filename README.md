# Upload-Csv-data-using-PHP
Upload Csv data using PHP

Using php Browse File Uplaod Function Insert data in to the My SQL Databese

Create a Random name Databse in My sql using php my admin or other way.


Check if the form is submitted 

Get the uploaded file

Only call this if you want to skip some lines on csv from top..

Skip the first 5 rows

// Loop through each row in the CSV file
 while (($data = fgetcsv($handle, 1000, ",")) !== false) {
 // Extract data from the CSV

 then

Execute the query
    
Close the file handle 

DOnt forgot to change your Database connection parameters ;)
