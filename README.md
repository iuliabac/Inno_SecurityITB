# Task Manager App

## Hosted App URL  
https://your-app-url.com

## Features preventing IDOR  
- Only task owners can view/edit/delete their tasks.  
- Admins can view all tasks.

## How to test  
1. Register as a new user and create tasks.  
2. Try to access `/tasks/{id}` of another user — access should be denied.  
3. Admin can log in to see all tasks.

## Security  
- App uses HTTPS only, secure and httpOnly cookies are enabled.  
- Sessions regenerate on login to prevent hijacking.  
- CSRF protection enabled on all forms.
