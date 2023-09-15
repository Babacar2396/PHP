<?php

class RoomModel {
    public function miseAjour()
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $updatedData = $data['updatedData'];

        foreach ($updatedData as $item) {
            $id = $item['id'];

            if (isset($item['ressource'])) {
                $ressource = $item['ressource'];
                $this->model->Modifier(['id' => $id, 'resource' => $ressource]);
            }

            if (isset($item['examen'])) {
                $examen = $item['examen'];
                $this->model->Modifier(['id' => $id, 'examen' => $examen]);
            }
        }
    }
  
}


