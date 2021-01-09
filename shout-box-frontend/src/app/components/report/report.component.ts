import { Component, OnInit } from '@angular/core';
import { ReportService } from 'src/app/services/report.service';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';
import { FormGroup, FormControl, Validators } from '@angular/forms';
import { FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-report',
  templateUrl: './report.component.html',
  styleUrls: ['./report.component.scss'],
})
export class ReportComponent implements OnInit {
  // regForm: FormGroup;

  issues: any = [
    'Its Spam',
    'its inappropriate',
    'Terrorism',
    'False News',
    'Harassment',
  ];

  //user_id: any;
  issue: any;
  session_id:any;

  //issue: any;
  constructor(
    private router: Router,
    private http: HttpClient,
    private service: ReportService
  ) {
    this.session_id = sessionStorage.getItem('id');
  }

  // id = 1;

  onSubmit1() {
    // this.issue = form.value.issue;
    let data = {
      post_id: sessionStorage.getItem('postid'),
      user_id: this.session_id,
      // sessionStorage.getItem('userid'),
      issue: this.issue,
    };
    console.warn(this.issue);

    // alert(data);

    this.service.report(data).subscribe((result) => {
      console.warn('result', result);
      this.router.navigate(['home']);
    });
  }

  ngOnInit() {}
}
