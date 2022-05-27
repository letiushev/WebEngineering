import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Pet } from './pet';

@Injectable({
  providedIn: 'root'
})
export class PetService {
  static getPets(): Pet[] | PromiseLike<Pet[]> {
    throw new Error('Method not implemented.');
  }
  private pets : Pet[]= [
    {
      id: 1,
      name: 'Iggy',
      species: 'Dog',
      birth: '2008.11.25',
      death: '2014.04.13',
      note: 'Good dog',
      status: 'DEAD',
    },
    {
      id: 2,
      name: 'Roger',
      species: 'Alien',
      birth: 'unknown',
      death: '',
      note: 'An alien from another planet',
      status: 'LIVING',
    },
    {
      id: 3,
      name: 'Klaus',
      species: 'Fish',
      birth: '1970.02.17',
      death: '',
      note: 'A fish which was a German skier',
      status: 'LIVING',
    },
    {
      id: 4,
      name: 'Tom',
      species: 'Cat',
      birth: '1948.07.23',
      death: '',
      note: 'Mischievous cat',
      status: 'LIVING',
    },
  ];

  private petUrl = 'http://localhost:3000/api/pets'

  constructor(
    private http: HttpClient
  ) {}

  public getPets(): Promise<Pet[]>{
    // return this.pets;
    return this.http.get<Pet[]>(this.petUrl).toPromise();
  }

  public getPet(id:number): Promise<Pet> {
    // return this.pets.find((pet)=>pet.id===id);
    return this.http.get<Pet>('${this.petUrl}/${id}').toPromise();
  }

  public updatPet(id: number, modifiedPet: Pet): Promise<Pet> {
    // // const pet= this.getPet(id);
    // // Object.assign(pet, modifiedPet);
    // // return pet;
    // return modifiedPet;
    return this.http.patch<Pet>('${this.petUrl}/${id}', modifiedPet).toPromise();
  }

  public addPet(newPet: Pet): Promise<Pet> {
    // const id = this.pets.length +1;
    // newPet.id=id;
    // this.pets.push(newPet);
    // return newPet;
    return this.http.post<Pet>(this.petUrl, newPet).toPromise();
  }


}
