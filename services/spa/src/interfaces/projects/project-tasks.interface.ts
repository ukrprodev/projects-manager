type Nullable<T> = T | null;

import {ProjectTaskInterface} from './project-task.interface';

export interface ProjectTasksInterface {
  project: {
    title: Nullable<string>,
    estimatedHours: Number
  },
  tasks: ProjectTaskInterface[]
}
