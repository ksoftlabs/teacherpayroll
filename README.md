# EasyPay Teacher Payroll System
## Introduction
This system was developed for IS2004 Web Application Development course of University of Colombo School of Computing.

## Installing
### Assumptions
1. You are installing this system locally using XAMPP
 

### Setup
1. Create a folder (teacherpayroll) in htdocs and copy the files 
2. Run TeacherPayRollScript.sql to create the database teacherpayroll (Or you can use TeacherPayRollModel.mwb MySQL Workbench model to forward engineer the database)
3. Create a user with all privileges and assign it to database teacherpayroll
4. Update username and password in connect.php
5. Load http://localhost/teacherpayroll/register_user.php
6. Register the admin user
7. Open the users table in database and change both user_approved and user_type values to 1
8. Log in at http://localhost/teacherpayroll/login.php

## License
EasyPay Teacher Payroll System is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

EasyPay Teacher Payroll System  is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with Foobar.  If not, see <http://www.gnu.org/licenses/>.