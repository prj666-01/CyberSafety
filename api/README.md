# CyberSafety API

This documentation details how the API works

## HTTP Requests

API endpoint

```
http://myvmlab.senecacollege.ca:6255/api
```

### Create new course

```
api/create/course
```
Requires body

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
