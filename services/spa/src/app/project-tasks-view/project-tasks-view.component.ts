import {Component} from '@angular/core';
import {ActivatedRoute, NavigationEnd, Router} from "@angular/router";
import {ProjectsService} from '../../services/projects.service';
import {MatButtonModule} from '@angular/material/button';
import {MatTableModule} from '@angular/material/table';
import {MatIconModule} from '@angular/material/icon';
import {ProjectTasksInterface} from '../../interfaces/projects/project-tasks.interface';
import {filter} from 'rxjs';
import {NgFor, NgIf} from '@angular/common';

@Component({
  selector: 'app-project-tasks-view',
  templateUrl: './project-tasks-view.component.html',
  styleUrl: './project-tasks-view.component.scss',
  imports: [
    MatButtonModule,
    MatTableModule,
    MatIconModule,
    NgIf,
    NgFor
  ],
  standalone: true,
  providers: [ProjectsService]
})

export class ProjectTasksViewComponent {

  protected data: ProjectTasksInterface = {project: {title: null, estimatedHours: 0}, tasks: []};
  protected previousUrl: string = '';

  displayedColumns: string[] = [
    'task',
    'assignee',
    'estimatedHours',
  ]

  constructor(
    private projectsService: ProjectsService,
    protected route: ActivatedRoute,
    protected router: Router,
  ) {
    router.events
      .pipe(filter(event => event instanceof NavigationEnd))
      .subscribe((event: NavigationEnd) => {
        if (this.route.snapshot.url.join('/').indexOf(event.url) !== -1) {
          this.previousUrl = event.url;
        }
      });
  }

  ngOnInit() {
    this.projectsService.getProjectTasks(this.route.snapshot.params['project'])
      .then(({data}) => this.data = data.data);
  }
}
