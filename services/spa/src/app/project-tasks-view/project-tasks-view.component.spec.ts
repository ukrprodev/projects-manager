import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ProjectTasksViewComponent } from './project-tasks-view.component';

describe('ProjectTasksViewComponent', () => {
  let component: ProjectTasksViewComponent;
  let fixture: ComponentFixture<ProjectTasksViewComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ProjectTasksViewComponent]
    })
    .compileComponents();

    fixture = TestBed.createComponent(ProjectTasksViewComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
