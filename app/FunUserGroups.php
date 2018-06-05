<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class FunUserGroups extends Model
{
    protected $table = 'funusergroups';
    
    public function selectedUsrList($id)
    {
        $sql = "
				SELECT 
					* 
				FROM 
					`users`
				WHERE 
					`id` IN (
						SELECT 
							`id` 
						FROM 
							`users` 
						AS 
							`Funusers_1`
						WHERE 
							INSTR(
								CONCAT(
									',', 
									(
										SELECT 
											`UsrList` 
										FROM 
											`funusergroups` 
										WHERE 
											`id`=".$id."
									), 
									','
								), 
								CONCAT(
									',', 
									`id`, 
									',' 
								)
							) > 0 
					)
				;
			";
        $result = DB::select($sql);
        return $result;
    }
    
    public function unseletedUsrList($id)
    {
        $sql = "
				SELECT 
					* 
				FROM 
					`users`
				WHERE 
					`id` Not IN (
						SELECT 
							`id` 
						FROM 
							`users` 
						AS 
							`Funusers_1`
						WHERE 
							INSTR(
								CONCAT(
									',', 
									(
										SELECT 
											`UsrList` 
										FROM 
											`funusergroups` 
										WHERE 
											`id`=".$id."
									), 
									','
								), 
								CONCAT(
									',', 
									`id`, 
									','
								)
							) > 0 
					)
				;
			";
        $result = DB::select($sql);
        return $result;
    }
    
    public function unseletedFunList($id)
    {
        $sql = "
				SELECT 
					* 
				FROM 
					`functions`
				WHERE 
					`id` Not IN (
						SELECT 
							`id` 
						FROM 
							`functions` 
						AS 
							`Functions_1`
						WHERE 
							INSTR(
								CONCAT(
									',', 
									(
										SELECT 
											`FunList` 
										FROM 
											`funusergroups` 
										WHERE 
											`id`=".$id."
									), 
									','
								), 
								CONCAT(
									',', 
									`id`, 
									','
								)
							) > 0 
					)
				;
			";
        $result = DB::select($sql);
        return $result;
    }
    
    public function seletedFunList($id)
    {
        $sql = "
				SELECT 
					* 
				FROM 
					`functions`
				WHERE 
					`id` IN (
						SELECT 
							`id` 
						FROM 
							`functions` 
						AS 
							`Functions_1`
						WHERE 
							INSTR(
								CONCAT(
									',', 
									(
										SELECT 
											`FunList` 
										FROM 
											`funusergroups` 
										WHERE 
											`id`=".$id."
										-- ;
									), 
									','
								), 
								CONCAT(
									',', 
									`id`, 
									',' 
								)
							) > 0 
					)
				;
			";
        $result = DB::select($sql);
        return $result;
    }
    
    public function operData($id)
    {
        $sql = "
			SELECT
				`id`,
				`Name`,
				`Valid`,
				`created_at`,
				`updated_at`,
				
                `Oid`
			FROM
				`funusergroups`
			WHERE
				`id`='".$id."'
			;
		";
        $result = DB::select($sql);
        return $result;
    }
}
