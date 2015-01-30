<?php
namespace Acme\GuestbookBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
/**
 * Task
 *
 * @ORM\Table()
 * @ORM\Entity
 * @IgnoreAnnotation("fn")
 */
class Task
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="text")
     */
    protected $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dueDate", type="datetime")
     */
    protected $dueDate;

    /**
     * @var string
     *
     * @ORM\Column(name="site", type="text")
     */
    protected $site;

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text")
     */
    protected $comment;

    /**
     * @var string
     *
     * @ORM\Column(name="point", type="text")
     */
    protected $point;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Task
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set dueDate
     *
     * @param \DateTime $dueDate
     * @return Task
     */
    public function setDueDate($dueDate)
    {
        $this->dueDate = $dueDate;

        return $this;
    }

    /**
     * Get dueDate
     *
     * @return \DateTime
     */
    public function getDueDate()
    {
        return $this->dueDate;
    }

    /**
     * Set site
     *
     * @param string $site
     * @return Task
     */
    public function setSite($site)
    {
        $this->site = $site;

        return $this;
    }

    /**
     * Get site
     *
     * @return string
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Task
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set point
     *
     * @param string $point
     * @return Task
     */
    public function setPoint($point)
    {
        $this->point = $point;

        return $this;
    }

    /**
     * Get point
     *
     * @return string 
     */
    public function getPoint()
    {
        return $this->point;
    }
}
