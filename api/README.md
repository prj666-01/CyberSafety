# CyberSafety API

This documentation details how the API works

## HTTP Requests
```
npm install
```

### Creating a new course

```
/api/create/course
```
Requires body

### Creating a new module

```
/api/create/module
```
Requires body

### Getting course

```
/api/get/course/{id}
```
### Getting module

```
/api/get/module/{id}
```
Optional body

### Modifying a course

```
/api/modify/course/{id}
```
Requires body

### Modifying a module

```
/api/modify/module/{id}
```
Requires body

### Removing a course

```
/api/remove/course/{id}
```
This removes all dependent modules

### Removing a module

```
/api/remove/module/{id}
```
