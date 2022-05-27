import { Component, Input, OnChanges, OnInit, Output,EventEmitter } from '@angular/core';
import { FormBuilder, Validators } from '@angular/forms';
import { Pet } from '../pet';

@Component({
  selector: 'app-pet-new',
  templateUrl: './pet-new.component.html',
  styleUrls: ['./pet-new.component.css']
})
export class PetNewComponent implements OnInit, OnChanges {
  @Input() pet = null;
  @Output() save = new EventEmitter<Pet>();

  petForm = this.fb.group({
    name: ['', [Validators.required]],
    species: ['',[Validators.required]],
    birth: ['',[Validators.required]],
    death: [''],
    note: [''],
    status: ['',[Validators.required]],
  });

  constructor(private fb: FormBuilder) { }

  get name() {
    return this.petForm.get('name');
  }
  get species() {
    return this.petForm.get('species');
  }
  get birth() {
    return this.petForm.get('birth');
  }
  get death() {
    return this.petForm.get('death');
  }
  get note() {
    return this.petForm.get('note');
  }
  get status() {
    return this.petForm.get('status');
  }

  ngOnInit(): void {
  }
  
  ngOnChanges(): void {
    this.petForm.patchValue(this.pet);
    
  }

  onSubmit(): void {
    if (this.petForm.valid) {
      this.save.emit(this.petForm.value)
    }
  }

}
