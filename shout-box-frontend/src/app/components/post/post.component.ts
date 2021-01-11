import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { PostService } from 'src/app/services/post.service';
import { Observable } from 'rxjs';
import { NgForm } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { FriendService } from 'src/app/services/friend.service';
// import { MatCardModule } from '@angular/material/card';

@Component({
  selector: 'app-post',
  templateUrl: './post.component.html',
  styleUrls: ['./post.component.scss'],
})
export class PostComponent implements OnInit {
  postData!: FormGroup;
  title = 'blog';
  Path: any = 'http://127.0.0.1:8000';
  session_id: any;
  text: any;
  filedata: any;
  user_id: any;
  x: any;
  users: any;
  data: any;

  public selectedFile: any;

  fileEvent(e: any) {
    this.filedata = e.target.files[0];
  }
  constructor(
    private post: PostService,
    private http: HttpClient,
    private ar: ActivatedRoute,
    private router: Router,
    private friend: FriendService
  ) {
    console.log('ctor of post');
    this.session_id = sessionStorage.getItem('id');
  }
  friendsPosts: Observable<any>;
  //function to add a friend
  addfriend(friend_id: number) {
    // this.user_id = sessionStorage.getItem('id');
    this.data = {
      user_id: this.session_id,
      friend_id: friend_id,
    };
    this.friend.addFriend(this.data).subscribe(
      () => {
        console.log('addeds');

      },
      (error) => {
        console.log(error);
      }
    );
    this.ngOnInit();
  }
  ngOnInit(): void {
    console.log('inside ngoninit post');

    this.user_id = this.session_id;
    //this.friendsPosts = this.post.getPostForTimeline(this.user_id);

    // this.users = this.friend.getAllUsers(this.user_id);

    //getting users for people you may know
    this.friend.getAllUsers(this.user_id).subscribe((result) => {
      // this.ngOnInit();
      this.users = result;
      console.log(this.users);
    });

    //get posts for timeline
    this.post.getPostForTimeline(this.user_id).subscribe((result) => {
      // this.ngOnInit();
      this.friendsPosts = result;

      console.log(this.friendsPosts);
    });
  }
  btnclick(id: any) {
    sessionStorage.setItem('postid', id);

    //this.router.navigate['report'];
    this.router.navigate(['report']);
  }
  onSubmitpost(f: NgForm) {
    // alert('in submit');
    // this.x = sessionStorage.getItem('userId');
    // this.x=4;
    this.user_id = this.session_id;
    let myformData = new FormData();
    const headers = new HttpHeaders();
    headers.append('Content-type', 'multipart/form-data');
    headers.append('Accept', 'application/json');
    myformData.append('multimedia', this.filedata);
    myformData.append('text', this.text);
    myformData.append('user_id', this.user_id);
    this.post.insertMultimedia(myformData).subscribe(() => {
      window.location.reload();
      // this.ngOnInit();
    });
  }
}
