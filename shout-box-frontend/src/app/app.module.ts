import { BrowserModule } from '@angular/platform-browser';
import { NgModule , ErrorHandler } from '@angular/core';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { FriendComponent } from './components/friend/friend.component';
import { PostComponent } from './components/post/post.component';
import { ReportComponent } from './components/report/report.component';
import { ProfileComponent } from './components/profile/profile.component';
import { FriendprofileComponent } from './components/friendprofile/friendprofile.component';
import { LoginComponent } from './components/login/login.component';
import { RegisterComponent } from './components/register/register.component';
import { FormBuilder,
  FormGroup,FormsModule, ReactiveFormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';
import { HomeComponent } from './components/home/home.component';
import { BioComponent } from './components/bio/bio.component';
import { HeaderComponent } from './components/header/header.component';
import { WelcomepageComponent } from './components/welcomepage/welcomepage.component';
import { CommonModule } from "@angular/common";

@NgModule({
  declarations: [
    AppComponent,
    FriendComponent,
    PostComponent,
    ReportComponent,
    ProfileComponent,
    FriendprofileComponent,
    LoginComponent,
    RegisterComponent,
    HomeComponent,
    BioComponent,
    HeaderComponent,
    WelcomepageComponent,
    
   
  ],
  imports: [CommonModule,BrowserModule, AppRoutingModule,FormsModule,
    ReactiveFormsModule, HttpClientModule],
  providers: [ErrorHandler],
  bootstrap: [AppComponent],
})
export class AppModule {}
