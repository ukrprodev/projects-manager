import { ComponentFixture, TestBed } from '@angular/core/testing';

import { UserProjectsViewComponent } from './user-projects-view.component';

describe('UserProjectsViewComponent', () => {
  let component: UserProjectsViewComponent;
  let fixture: ComponentFixture<UserProjectsViewComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [UserProjectsViewComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(UserProjectsViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
