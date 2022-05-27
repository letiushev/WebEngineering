import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { AboutComponent } from './about/about.component';
import { MainPageComponent } from './main-page/main-page.component';
import { PetDetailComponent } from './pet-detail/pet-detail.component';
import { PetEditComponent } from './pet-edit/pet-edit.component';
import { PetListComponent } from './pet-list/pet-list.component';
import { PetNewComponent } from './pet-new/pet-new.component';

const routes: Routes = [
  {
    path: "",
    component: MainPageComponent,
    pathMatch: "full",
  },
  {
    path: "pets",
    component: PetListComponent,
  },
  {
    path: "pets/new",
    component: PetEditComponent,
  },
  {
    path: "pets/:id",
    component: PetDetailComponent,
  },
  {
    path: "pets/:id/edit",
    component: PetEditComponent,
  },
  {
    path: "about",
    component: AboutComponent,
  },
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
