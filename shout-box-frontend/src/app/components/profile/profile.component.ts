import { Component, OnInit } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { PostService } from 'src/app/services/post.service';
import { Observable } from 'rxjs';
import { NgForm } from '@angular/forms';
import { FormGroup } from '@angular/forms';
import { ReactiveFormsModule } from '@angular/forms';
import { ActivatedRoute } from '@angular/router';
import { Router } from '@angular/router';
import { FriendService } from 'src/app/services/friend.service';
import { DOCUMENT } from '@angular/common';

// import { MatCardModule } from '@angular/material/card'

@Component({
  selector: 'app-profile',
  templateUrl: './profile.component.html',
  styleUrls: ['./profile.component.scss'],
})
export class ProfileComponent implements OnInit {
  title = 'blog';
  Path: any = 'http://127.0.0.1:8000';

  click: boolean = false;
  showEdit: boolean = false;
  isEditClicked: boolean = false;
  isBioAdded: boolean = false;
  isBioAvailable: boolean = false;
  data: any;
  posts: any;
  user_id: any;
  bio: any;
  x: any;
  friend: Observable<any>;
  updatedData: any;
  length: number;
  demo: boolean = false;
  work: any;
  college: any;
  school: any;
  location: any;
  native_place: any;
  loggedInUser: boolean = false;
  session_id: any;
  biodata: any;
  // post_id: any;

  constructor(
    private post: PostService,
    private http: HttpClient,
    private router: Router,
    private friends: FriendService,
    private ar: ActivatedRoute
  ) {
    if (this.click === true) {
      this.friend = this.router.getCurrentNavigation().extras.state.sendFriend;
      console.log(this.friend);
    }
    this.session_id = sessionStorage.getItem('id');
    // sessionStorage.setItem('userId', '2');

    // this.post.getData().subscribe((val) => {
    //   this.data = val;
    // });
  }
  friendComponent(event) {
    this.click = event;
  }
  btnclick(id: any) {
    sessionStorage.setItem('postid', id);

    //this.router.navigate['report'];
    this.router.navigate(['report']);
  }

  isPresent: boolean = true;

  Data(user_id: any) {
    // let id = '1';
    //  if(user_id == sessionStorage.getItem('userid'))
    if (user_id == this.session_id) {
      return false;
    } else {
      return true;
    }
  }

  editBio() {
    this.isEditClicked = true;
  }
  onSubmit(form: NgForm) {
    this.user_id = this.session_id;
    // console.log(this.work);
    console.log(form.value.work);

    // this.work=form.value.work;
    // this.college=form.value.college;
    // this.school=form.value.school;
    // this.location=form.value.location;
    // this.native_place=form.value.native_place;

    let myformData = new FormData();
    myformData.append('work', form.value.work);
    myformData.append('college', form.value.college);
    myformData.append('school', form.value.school);
    myformData.append('location', form.value.location);
    myformData.append('native_place', form.value.native_place);
    // myformData.append('user_id', this.user_id);
    this.friends.updateBio(myformData, this.user_id).subscribe(
      () => {
        console.log('addeds');
        //to refresh component
        this.ngOnInit();
      },
      (error) => {
        console.log(error);
      }
    );
  }

  // LoggedInUser(user_id:number)
  // {
  //   this.post.getDataById(user_id).subscribe((result) => {
  //     // this.ngOnInit();
  //     this.posts = result;
  //     console.log(this.posts);
  //   });
  // }
  deletePost(post_id: number) {
    this.user_id = this.session_id;
    // this.p_id = post_id;
    console.log(post_id);

    this.post.deletePost(post_id).subscribe(
      () => {
        console.log('deleted');
      },

      (error) => {
        console.log(error);
      }
    );
  }
  ngOnInit(): void {
    this.user_id = this.ar.snapshot.paramMap.get('user_id');
    alert(this.user_id);

    if (this.user_id == this.session_id) {
      this.loggedInUser = true;

      // this.LoggedInUser(this.user_id);
    }
    //getting post of user or frirnd by id
    this.posts = this.post.getDataById(this.user_id);
    // this.ngOnInit();
    // this.post.getDataById(this.user_id).subscribe((result) => {
    //   // this.ngOnInit();
    //   this.posts = result;
    //   console.log('inside own profile ' + this.user_id);
    //   console.log(this.posts);
    // });

    //delete post

    // this.bio=this.friends.getFriendsBio(this.user_id);

    this.friends.getFriendsBio(this.user_id).subscribe((result) => {
      this.bio = result;
      this.length = this.bio.length;
      console.log('-----------' + this.length);
      // console.log(this.bio[0].work);
      // console.log(this.length);
      console.log(this.bio);
      // alert(this.length);
      if (this.length === 0) {
        //alert('----' + this.length);
        this.isBioAvailable = false;
        this.demo = true;
        // alert('demo in if -- ' + this.demo);
      } else {
        this.isBioAvailable = true;
        this.demo = false;
        // alert('demo' + this.demo);
      }

      this.work = this.bio[0].work;
      this.college = this.bio[0].college;
      this.school = this.bio[0].school;
      this.location = this.bio[0].location;
      this.native_place = this.bio[0].native_place;
    });
  }
}
