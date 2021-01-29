User Stories
 Register
 Login
 Logout
 Reset password
 Email confirmations
Create tweet
Like tweet
Add friend
Remove friend
View profile

https://dev.to/safventure/deploy-laravel-application-with-database-to-heroku-l50

**************************************
*     Application In Production!     *
**************************************

 Do you really wish to run this command? (yes/no) [no]:
 > yes


In Connection.php line 678:
                                                                                                                                                                                                                
  SQLSTATE[22023]: Invalid parameter value: 7 ERROR:  invalid value for parameter "client_encoding": "utf8mb4" (SQL: select * from information_schema.tables where table_schema = public and table_name = migr  
  ations and table_type = 'BASE TABLE')                                                                                                                                                                         
                                                                                                                                                                                                                

In PostgresConnector.php line 68:
                                                                                                                
  SQLSTATE[22023]: Invalid parameter value: 7 ERROR:  invalid value for parameter "client_encoding": "utf8mb4"  
