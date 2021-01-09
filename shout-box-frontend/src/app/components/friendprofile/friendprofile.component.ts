import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { Observable } from 'rxjs';
import { FriendService } from 'src/app/services/friend.service';
@Component({
  selector: 'app-friendprofile',
  templateUrl: './friendprofile.component.html',
  styleUrls: ['./friendprofile.component.scss'],
})
export class FriendprofileComponent implements OnInit {
  friend: any;
  post: Observable<any>;
  bio: Observable<any>;
  session_id:any;
  constructor(private router: Router,private friendprofile:FriendService) {
    this.friend = this.router.getCurrentNavigation().extras.state.sendFriend;
    console.log(this.friend);

    this.session_id = sessionStorage.getItem('id');
  }

 
  btnclick(id:any) {
   sessionStorage.setItem('postid',id);

   //this.router.navigate['report'];
   this.router.navigate(['report']);
 }

 isPresent:boolean=true;

 Data(user_id:any){
    
         //  if(user_id == sessionStorage.getItem('userid'))
          if(user_id == this.session_id)
          {

          return false;

          }
          else{

            return true;

           }
        }

  ngOnInit(): void {

    // this.friendprofile.getFriendsPosts(this.friend.id).subscribe((result) => {
    //   this.post = result;
     
    // });
    console.log(this.friend.id);
    
    this.post=this.friendprofile.getFriendsPosts(this.friend.id);
    
    // this.friendprofile.getFriendsBio(this.friend.id).subscribe((result)=>
    // {
    //   this.bio=result;
    //   console.log(this.bio);
    // });

    
  }
}
