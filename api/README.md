# CyberSafety API 0.2

This documentation details how the API 0.2 works

## HTTP Requests

API endpoint

```
http://myvmlab.senecacollege.ca:6255/api
```

### Create new course

```
POST: api/courses
```
Method: POST

Requires request body

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
  "Course_Status": Integer,
  "Is_Approved": Integer,
}
```

### Create new module

```
api/create/module
```
Requires body

### Get course

```
api/get/course/{id}
```
#### Get courses

```
api/get/courses/
```

#### Get courses by UserID

```
api/get/coursesByUser/{id}
```

### Get module

```
api/get/module/{id}
```
Optional body

#### Get modules

```
api/get/modules/
```


#### Get modules by CourseID

```
api/get/modulesByCourse/{id}
```

### Modify course (Not implemented yet)

```
api/modify/course/{id}
```
Requires body

### Modify module (Not implemented yet)

```
api/modify/module/{id}
```
Requires body

### Remove course (Not implemented yet)

```
api/remove/course/{id}
```
This removes all dependent modules

### Remove a module (Not implemented yet)

```
api/remove/module/{id}
```
