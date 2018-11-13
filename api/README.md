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

Sample Request Body:

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

Sample Request Body:

```
{
	"Username": String,
  "Email": String,
  "Password" : String,
  "First_Name" : String,
  "Last_Name" : String,
	"Is_Authenticated": Integer,
  "Teaching_Level" : Integer,
  "Date_Joined" : date,
  "Last_Login" : date,
  "Badge_Id" : Integer,
  "Is_Administrator" : Integer
}
```

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

### Get Last Course

```
GET: api/courses/last
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

### Get Last Module

```
GET: api/modules/last
```
Method: GET

### Get Modules By Course ID

```
GET: api/courses/{id}/modules
```
Method: GET

### Get All Users

```
GET: api/users/
```
Method: GET

### Get One User

```
GET: api/users/{id}
```
Method: GET

### Get Last User

```
GET: api/users/last
```
Method: GET

### Modify Course

```
PUT: api/courses/{id}
```

Requires body

Sample Request Body:

```
{
    "courseTitle": String,
    "courseAuthor": String,
    "User_Id": Integer,
    "courseTeachingLevel": Integer,
    "courseDescription": String,
    "courseDataCreated": date,
    "courseDataLastUpdated": date,
    "Course_Status": Integer,
    "Is_Approved": Integer
}
```

### Modify Module

```
PUT: api/modules/{id}
```

Requires body

Sample Request Body:

```
{
    "Module_Title": String,
    "Course_Id": Integer,
    "Content_Type": String,
    "Content": Blob,
    "Quiz": Integer
}
```

### Modify User

```
PUT: api/users/{id}
```
Requires body

Sample Request Body:

```
{
    "Username": String,
    "Email": String,
    "Password": "String,
    "First_Name": String,
    "Last_Name": String,
    "Is_Authenticated": Integer,
    "Teaching_Level": Integer,
    "Date_Joined": date,
    "Last_Login": date,
    "Badge_Id": Integer,
    "Is_Administrator": Integer
}
```

### Remove Course

```
DELETE: api/courses/{id}
```
This removes all dependent modules

### Remove Module

```
DELETE api/modules/{id}
```
### Remove User

```
DELETE api/users/{id}
```
