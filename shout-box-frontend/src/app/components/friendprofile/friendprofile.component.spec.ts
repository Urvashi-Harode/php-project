import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FriendprofileComponent } from './friendprofile.component';

describe('FriendprofileComponent', () => {
  let component: FriendprofileComponent;
  let fixture: ComponentFixture<FriendprofileComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FriendprofileComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FriendprofileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
