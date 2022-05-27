import { Component, OnInit } from '@angular/core';
import { PetService } from '../pet.service';
import { Pet } from '../pet';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-main-page',
  templateUrl: './main-page.component.html',
  styleUrls: ['./main-page.component.css']
})
export class MainPageComponent implements OnInit {

  constructor(
    private http: HttpClient
  ) { }

  pets : Pet[]= [];

  async ngOnInit(): Promise<void> {
    this.pets=await this.getPets();
  }

  private petUrl = 'http://localhost:3000/api/pets'

  public getPets(): Promise<Pet[]>{
    // return this.pets;
    return this.http.get<Pet[]>(this.petUrl).toPromise();
  }
}
