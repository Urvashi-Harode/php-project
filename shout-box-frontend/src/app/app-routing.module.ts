import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { FriendComponent } from './components/friend/friend.component';
import { FriendprofileComponent } from './components/friendprofile/friendprofile.component';
import { PostComponent } from './components/post/post.component';
import { ProfileComponent } from './components/profile/profile.component';
import { ReportComponent } from './components/report/report.component';
import { HomeComponent } from './components/home/home.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { AppComponent } from './app.component';

const routes: Routes = [
  {
    path: '',
    component: LoginComponent
  },
  {
    path: 'home',
    component: HomeComponent,
  },

  {
    path: 'friends',
    component: FriendComponent,
  },
  {
    path: 'friendprofile',
    component: FriendprofileComponent,
  },
  {
    path: 'post',
    component: PostComponent,
  },
  {
    path: 'profile',
    component: ProfileComponent,
  },
  {
    path: 'profile/:user_id',
    component: ProfileComponent,
  },
  {
    path: 'report',
    component: ReportComponent,
  },
  {
    path: 'login',
    component: LoginComponent,
  },
  {
    path: 'register',
    component: RegisterComponent,
  },
  {
    path: 'logout',
    component: LoginComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule],
})
export class AppRoutingModule {}
