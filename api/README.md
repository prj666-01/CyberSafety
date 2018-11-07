# CyberSafety API 0.2

This documentation details how the API 0.2 works

## HTTP Requests

API endpoint

```
http://myvmlab.senecacollege.ca:6255/api
```

### Create Course

```
POST: api/courses
```
Method: POST

Request body: Required

Return: JSON object of the newly created course

Sample body:

```
{
  "Course_Id": Integer,
  "Course_Title": String,
  "Course_Author": String,
  "User_Id": Integer,
  "Course_Description": String,
  "Date_Created": date,
  "Date_Last_Updated": date,
  "Course_Status": String,
  "Is_Approved": Integer,
}
```

### Create Module

```
POST: api/modules
```
Method: POST

Request body: Required

Return: JSON object of the newly created module

### Create User

```
POST: api/users
```
Method: POST

Request body: Required

Return: JSON object of the newly created user

### Get All Courses

```
GET: api/courses/
```
Method: GET

### Get One Course

```
GET: api/courses/{id}
```
Method: GET

### Get Courses By User ID

```
GET: api/users/{id}/courses
```
Method: GET


### Get All Modules

```
GET: api/modules/
```
Method: GET

### Get One Module

```
GET: api/modules/{id}
```
Method: GET

### Get Modules By Course ID

```
GET: api/courses/{id}/modules
```
Method: GET

### Modify Course (Not implemented yet)

```
api/modify/course/{id}
```
Requires body

### Modify Module (Not implemented yet)

```
api/modify/module/{id}
```
Requires body

### Remove Course (Not implemented yet)

```
api/remove/course/{id}
```
This removes all dependent modules

### Remove Module (Not implemented yet)

```
api/remove/module/{id}
```
