<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    

    //Ajouté pour l'imprécision de OVH sur les minutes
    protected function scheduleRunsHourly(Schedule $schedule)
    {
        foreach ($schedule->events() as $event) {
            $event->expression = substr_replace($event->expression, '*', 0, 1);
        }
    }


    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            

        //Supprimer toutes les alertes a propos de la date de fin du contrat
         \App\Models\Alert::where('categorie','Contrats')->delete();
         
         //Rechercher la liste des users dont la date du contrat est critique
         $usersAlerteFin=\App\Models\User::where('contrat','<>','CDI Titulaire')
                                ->where('actif','oui')
                                ->where('fin','<',\Carbon\Carbon::now()->addDays(15)->toDateString())
                                ->get();

         if (isset($usersAlerteFin))
         {
               //tous les users
               $allUsers=$users=\App\Models\User::where('actif','oui')->get();

               //
               foreach($usersAlerteFin as $userAlerteFin)
               {
                  
                  //Alerter tous les rh et admin et chaque fin du contract
                  foreach($allUsers as $user)
                  {
                     
                    if ($user->hasRole(['rh','admin']))
                    {

                       $alert=new \App\Models\Alert();
                       $alert->user_id=$user->id;
                       $alert->alert_table="users";
                       $alert->element_id=$userAlerteFin->id;
                       $alert->val_encours=$userAlerteFin->fin;
                       $alert->categorie="Contrats";
                       $alert->date=date('Y-m-d H:i:s');
                       
                       $joursRestants= \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parseFromLocale($userAlerteFin->fin));
                       if (\Carbon\Carbon::now() <= \Carbon\Carbon::parseFromLocale($userAlerteFin->fin))
                           $alert->message=$joursRestants." jour(s) restant(s) avant la fin du contrat de : ".$userAlerteFin->name." (".$userAlerteFin->ref.")" ;
                       else
                           $alert->message=$joursRestants." jour(s) depuis la fin du contrat de : ".$userAlerteFin->name." (".$userAlerteFin->ref.")" ;
                       
                       

                       
                       $alert->typealert="Contrats";

                        if ($user->hasRole('rh'))
                        {
                           $alert->alert_route="rhEditUser";
                        }

                        if ($user->hasRole('admin'))
                        {
                           $alert->alert_route="rhEditUser";
                        }


                       $alert->save();
                     }
                  }
                  


               }
         }

         
        })->hourlyAt(18);



        $this->scheduleRunsHourly($schedule);

    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
