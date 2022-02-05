<?php
/*
 * Copyright 2010 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

/**
 * Service definition for Directory (directory_v1).
 *
 * <p>
 * The Admin SDK Directory API lets you view and manage enterprise resources such as users and groups, administrative notifications, security features, and more.
 * </p>
 *
 * <p>
 * For more information about this service, see the API
 * <a href="https://developers.google.com/admin-sdk/directory/" target="_blank">Documentation</a>
 * </p>
 *
 * @author Google, Inc.
 */
class Google_Service_Directory extends Google_Service
{
  /** View and manage your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS = "https://www.googleapis.com/auth/admin.directory.device.chromeos";
  /** View your Chrome OS devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_CHROMEOS_READONLY = "https://www.googleapis.com/auth/admin.directory.device.chromeos.readonly";
  /** View and manage your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE = "https://www.googleapis.com/auth/admin.directory.device.mobile";
  /** Manage your mobile devices by performing administrative tasks. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_ACTION = "https://www.googleapis.com/auth/admin.directory.device.mobile.action";
  /** View your mobile devices' metadata. */
  const ADMIN_DIRECTORY_DEVICE_MOBILE_READONLY = "https://www.googleapis.com/auth/admin.directory.device.mobile.readonly";
  /** View and manage the provisioning of groups on your domain. */
  const ADMIN_DIRECTORY_GROUP = "https://www.googleapis.com/auth/admin.directory.group";
  /** View and manage group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER = "https://www.googleapis.com/auth/admin.directory.group.member";
  /** View group subscriptions on your domain. */
  const ADMIN_DIRECTORY_GROUP_MEMBER_READONLY = "https://www.googleapis.com/auth/admin.directory.group.member.readonly";
  /** View groups on your domain. */
  const ADMIN_DIRECTORY_GROUP_READONLY = "https://www.googleapis.com/auth/admin.directory.group.readonly";
  /** View and manage notifications received on your domain. */
  const ADMIN_DIRECTORY_NOTIFICATIONS = "https://www.googleapis.com/auth/admin.directory.notifications";
  /** View and manage organization units on your domain. */
  const ADMIN_DIRECTORY_ORGUNIT = "https://ww