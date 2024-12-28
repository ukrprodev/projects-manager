import {Component} from '@angular/core';
import {ProjectsService} from '../../services/projects.service';
import {Router} from '@angular/router';
import {ProjectInterface} from '../../interfaces/projects/project.interface';
import {MatButtonModule} from '@angular/material/button';
import {MatTableModule} from '@angular/material/table';
import {MatIconModule} from '@angular/material/icon';
import {NgFor, NgIf} from "@angular/common";

@Component({
  selector: 'app-projects-list',
  templateUrl: './projects-list.component.html',
  styleUrl: './projects-list.component.scss',
  imports: [
    MatButtonModule,
    MatTableModule,
    MatIconModule,
    NgFor,
    NgIf
  ],
  standalone: true,
  providers: [ProjectsService]
})
export class ProjectsListComponent {

  displayedColumns: string[] = [
    'title',
    'members',
    'estimatedHours',
    'actions'
  ]

  projects: ProjectInterface[] = [];

  constructor(
    private projectsService: ProjectsService,
    public router: Router
  ) {
  }

  ngOnInit() {
    this.projectsService.getProjects()
      .then(({data}) => this.projects = data.data.projects);
  }
}
