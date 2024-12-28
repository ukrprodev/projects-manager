import {ProjectMember} from './project-member.interface';

export interface ProjectInterface {
  id: Number,
  title: string,
  members: ProjectMember[],
  estimatedHours: Number
}
