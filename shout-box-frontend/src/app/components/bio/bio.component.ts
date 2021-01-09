import { Component, OnInit } from '@angular/core';
import { BioService } from 'src/app/services/bio.service';

@Component({
  selector: 'app-bio',
  templateUrl: './bio.component.html',
  styleUrls: ['./bio.component.scss']
})
export class BioComponent implements OnInit {

  constructor(private bio:BioService) { }

  ngOnInit(): void {
    
    
  }

}
