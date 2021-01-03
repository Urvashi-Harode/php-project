import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Observable } from 'rxjs';

const user = 'http://127.0.0.1:8000/api/display';
const loginUrl = 'http://127.0.0.1:8000/api/login';
const registerUrl = 'http://127.0.0.1:8000/api/register';

@Injectable({
  providedIn: 'root'
})
export class UserServiceService {
  [x: string]: any;

  constructor(private http: HttpClient) { }

  user(): Observable<any>{
    return this.http.get(user);
  }

  login(credentials: any): Observable<any>{
    return this.http.post(loginUrl, credentials);
  }

  register(credentials: any): Observable<any>{
    console.log("in register function");
    console.log(credentials.value);
    
    
    return this.http.post(registerUrl,credentials);
  }

}
