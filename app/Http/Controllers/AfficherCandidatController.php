<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AfficherCandidatController extends Controller
{
    /**** Affichage des candiats avec leurs nombres de voix regroupé par candidat****/
    public function afficherresultatcandidat()
    {
        try
        {
            $etatvote = DB::table('etats')
            ->select(['etats.etat'])
            ->where('etats.id','=',1)
            ->first();
    
            /** verifier si le vote est fermé et que c'est un élécteur **/
            if($etatvote->etat==1)
            {
            return redirect('/')->with('message','Désolé les votes sont ouverts.Ils doivent être fermés avant acceder aux publications');
            }
            
            $nombre_voix = DB::select('select candidat_id, c.nomcd, c.prenomcd, c.nomparti, c.imagecd, (count(v.id)/
            (select count(v.id) from votes v join candidats c on v.candidat_id = c.id))*100 as pourcentage,count(v.id) as nombre
            from votes v
            join candidats c on v.candidat_id = c.id
            group by candidat_id');

            return view('Candidatvote.nombrevotecandidat',compact('nombre_voix'));
        }
        catch(\Exception $exception)
        {
             return ' Une erreur s"est produite veuillez contactez le service pour plus d" information';
        }
    }

    public function nombrevoteregion()
    {
        try
        {
            $region_voix = DB::select('select  r.nom, candidat_id, c.nomcd, c.prenomcd, c.nomparti, c.imagecd, count(v.id) as nombre 
            from votes v join candidats c on v.candidat_id = c.id
            join users u on u.id = v.utilisateur_id
            join regions r on u .region_id = r.id
            group by r.id,c.id');

            return view('Candidatvote.nombrevoteregion',compact('region_voix'));
        }
        catch(\Exception $exception)
        {
            // return $exception->getMessage();
            return view('Erreurs.erreurelecteur');
        }
    }
}
