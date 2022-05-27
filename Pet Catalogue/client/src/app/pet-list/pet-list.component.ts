import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Pet } from '../pet';
import { PetService } from '../pet.service';

@Component({
  selector: 'app-pet-list',
  templateUrl: './pet-list.component.html',
  styleUrls: ['./pet-list.component.css']
})
export class PetListComponent implements OnInit {

  pets : Pet[]= [];
  pet = new Pet();

selectedPet : Pet = null;

  constructor(
    private route: ActivatedRoute,
    private petService: PetService
  ) { }

  async ngOnInit(): Promise<void>  {
    this.pets=await this.petService.getPets();
    const id = +this.route.snapshot.paramMap.get('id');
    this.pet= await this.petService.getPet(id);
  }

  handleSave(pet): void {
    Object.assign(this.selectedPet, pet);
    this.selectedPet = null;
  }
}
