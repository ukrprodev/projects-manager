import {ProjectMember} from './project-member.interface';

export interface ProjectTaskInterface {
  id: string,
  assignee: ProjectMember[],
  task: string,
  estimatedHours: Number
}
