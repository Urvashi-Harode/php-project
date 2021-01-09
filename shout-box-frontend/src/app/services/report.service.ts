import { Injectable } from '@angular/core';
import { Observable, throwError } from 'rxjs';
import { retry, catchError } from 'rxjs/operators';
import { HttpClient } from '@angular/common/http'
@Injectable({
  providedIn: 'root'
})
export class ReportService {

  constructor(private http:HttpClient) { }

  getPostOfUsers(): Observable<any>{
    return this.http.get('http://localhost:8000/api/list')
  }


//   onSubmit(data:any){
//   return this.http.post('http://localhost:8000/api/stores', data);
//  }



 report(data:any){
  return this.http.post('http://localhost:8000/api/isReported', data).pipe(
    retry(1),
    catchError(this.handleError));
}
handleError(error:any) {
  let errorMessage = '';
  if (error.error instanceof ErrorEvent) {
    // client-side error
    errorMessage = `Error: ${error.error.message}`;
  } else {
    // server-side error
    errorMessage = `Error Code: ${error.status}\nMessage:already reported`;
  }
  window.alert(errorMessage);
  return throwError(errorMessage);
}

}