import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { FriendService } from 'src/app/services/friend.service';
import { Observable } from 'rxjs';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-friend',
  templateUrl: './friend.component.html',
  styleUrls: ['./friend.component.scss'],
})
export class FriendComponent implements OnInit {
  @Input() attemptClick: boolean = false;
  @Output() public notify: EventEmitter<any> = new EventEmitter<any>();
  friends: Observable<any>;
  users: Observable<any>;
  pending: Observable<any>;
  data: any;
  user_id: any;
  session_id: any;
  f_id: any;
  flag: boolean = false;
  isfriend: any;
  length: number;
  sendFriend: any;

  isAddClicked: boolean = true;

  isClicked: boolean = false;
  isPendingClicked: boolean = false;
  constructor(
    private friend: FriendService,
    private ar: ActivatedRoute,
    private router: Router
  ) {
    this.session_id = sessionStorage.getItem('id');
    console.log('session id' + this.session_id);
  }

  // sessionStorage.setItem('user_id', 1);
  // this.user_id = sessionStorage.getItem('id');
  // addfriend(friend_id: number) {
  //   // this.user_id = sessionStorage.getItem('id');
  //   this.data = {
  //     user_id: this.session_id,
  //     friend_id: friend_id,
  //   };
  //   this.friend.addFriend(this.data).subscribe(
  //     () => {
  //       console.log('addeds');
  //       this.isAddClicked = false;

  //     },
  //     (error) => {
  //       console.log(error);
  //     }
  //   );
  //   this.ngOnInit();
  // }

  acceptRequest(friend_id: number) {
    this.data = {
      user_id: this.session_id,
      friend_id: friend_id,
    };
    this.friend.acceptRequest(this.data).subscribe(
      () => {
        console.log('addeds');
      },
      (error) => {
        console.log(error);
      }
    );
    this.ngOnInit();
  }

  removeFriend(friend_id: number) {
    // this.user_id = this.ar.snapshot.queryParamMap.get('user_id');
    // this.friend_id = this.ar.snapshot.queryParamMap.get('friend_id');

    this.user_id = this.session_id;

    this.f_id = friend_id;
    console.log(this.f_id);

    this.friend.removeFriend(this.user_id, this.f_id).subscribe(
      () => {
        console.log('addeds');
        this.ngOnInit();
      },
      (error) => {
        console.log(error);
      }
    );

  }

  showPost(f: any) {
    // alert('hii');
    console.log(f.id);
    this.user_id = this.session_id;
    // this.isfriend = this.friend.isFriend(f.id, this.user_id);

    this.friend.isFriend(this.user_id, f.id).subscribe((result) => {
      this.isfriend = result;
      this.length = this.isfriend.length;
      console.log('inside friend comp');

      console.log(this.isfriend);
      this.attemptClick = true;
      this.notify.emit(this.attemptClick);
      if (this.length > 0) {
        //this.flag=true;
        this.router.navigate(['/profile/' + f.id + '/' + f.firstname], {
          state: {
            sendFriend: f,
          },
        });
      } else {
        alert('you are not my friend!!');
      }
    });
    //  alert("length::"+this.length);

    //console.log('----------' + this.isfriend[0].firstname);
    // if (this.isfriend) {
    //   this.flag = true;
    //   console.log(this.flag);
    // } else {
    //   this.flag = false;
    // }
  }
  // friendsposts()
  // {
  //   this.user_id = 1;
  //   this.friend.getFriendsPosts(this.user_id).subscribe((result) => {
  //     this.friendsPosts = result;
  //     console.log(this.friendsPosts[0].text);

  //   });
  // }

  // showPeopleYouMayKnow() {
  //   this.isPendingClicked = false;
  //   this.isClicked = true;
  // }
  showPendingFriends() {
    this.isClicked = false;
    this.isPendingClicked = true;

  }
  ngOnInit(): void {
    // this.user_id = this.ar.snapshot.paramMap.get('user_id');
    this.user_id = this.session_id;

    this.friends = this.friend.getAcceptedFriends(this.user_id);

    // this.users = this.friend.getAllUsers(this.user_id);

    // this.pending = this.friend.getAllPendingRequest(this.user_id);
    // console.log();

    this.friend.getAllPendingRequest(this.user_id).subscribe((result) => {
      // this.ngOnInit();
      this.pending = result;
      console.log(this.pending);
    });


  }
}
