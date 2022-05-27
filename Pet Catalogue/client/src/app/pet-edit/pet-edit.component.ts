import { Location } from '@angular/common';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { Pet } from '../pet';
import { PetService } from '../pet.service';

@Component({
  selector: 'app-pet-edit',
  templateUrl: './pet-edit.component.html',
  styleUrls: ['./pet-edit.component.css']
})
export class PetEditComponent implements OnInit {

  pet = new Pet();

  constructor(
    private route: ActivatedRoute,
    private petService: PetService,
    private location: Location,
    private router: Router
  ) { }

  async ngOnInit(): Promise<void> {
    const id = +this.route.snapshot.paramMap.get('id');
    if (id) {
      this.pet=await this.petService.getPet(+id);
    }
  }

  async handleSave(pet): Promise<void> {
    if (this.pet.id) {
      this.petService.updatPet(this.pet.id, pet);
      this.location.back();
    } else {
      await this.petService.addPet(pet);
      this.router.navigate(['/pets']);
    }
  }
}
  
