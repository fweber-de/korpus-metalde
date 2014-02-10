<?php

namespace Korpus\AdminPanelBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PageController extends Controller
{
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('korpus_admin_panel_dashboard'));
    }

    public function dashboardAction()
    {
        //news
        $sourceLogs = $this->getDoctrine()->getRepository('KorpusDataBundle:SourceLog')->findAllPerNewsPost();

        $logs = array();

        foreach ($sourceLogs as $log) {
            $logs[] = array(
                'count' => $log[1],
                'title' => $log[0]->getPost()->getTitle(),
                'source' => $log[0]->getSource()
            );
        }

        //serverinfo
        $currentUsage = disk_total_space('/') - disk_free_space('/');
        $maxSize = disk_total_space('/');
        $percentage = number_format(($currentUsage / $maxSize) * 100, 2, '.', '');
        $freeSpace = disk_free_space('/');

        $currentUsageMB = $currentUsage / 1000000;
        $maxSizeMB = $maxSize / 1000000;
        $freeSpaceMB = $freeSpace / 1000000;

        $progressbarClass = 'info';
        if ((double)$percentage >= 30) {
            $progressbarClass = 'warning';
        } else if ((double)$percentage >= 70) {
            $progressbarClass = 'danger';
        }

        return $this->render('KorpusAdminPanelBundle:Page:dashboard.html.twig', array(
            'logs' => $logs,
            'percentage' => $percentage,
            'current_usage' => number_format($currentUsageMB, 2, ',', '.'),
            'max_size' => number_format($maxSizeMB, 2, ',', '.'),
            'free_space' => number_format($freeSpaceMB, 2, ',', '.'),
            'progressbar_class' => $progressbarClass
        ));
    }
}
